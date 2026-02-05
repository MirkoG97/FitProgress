<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function trainers()
    {
        return $this->belongsToMany(User::class, 'user_trainer_assignment', 'user_id', 'personal_trainer_id')
                    ->using(UserTrainerAssignment::class)
                    ->withTimestamps();
    }

    public function athletes()
    {
        return $this->belongsToMany(User::class, 'user_trainer_assignment', 'personal_trainer_id', 'user_id')
                    ->using(UserTrainerAssignment::class)
                    ->withTimestamps();
    }

    public static function insertUserIntoDB($role_id, $name, $surname, $email, $password)
    {
        DB::insert('INSERT INTO users (role_id, name, surname, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)', [
            $role_id,
            $name,
            $surname,
            $email,
            Hash::make($password),
            now(),
            now()
        ]);
    }   

    public static function getUserByEmailAndPassword($email, $password)
    {
        $user = DB::select('SELECT * FROM users WHERE email = ? LIMIT 1', [$email]);
        
        if ($user && Hash::check($password, $user[0]->password)) {
            //creazione di un'istanza di User e popolamento con l'oggetto stdClass ottenuto dalla query
            return (new User())->setRawAttributes((array) $user[0]);
        }
        return null;
    }

    public static function getAllUsers()
    {
        $users = DB::select('SELECT id,name,surname,role_id FROM users WHERE role_id = 1');
        if($users){
            return $users;
        }
        return null;
    }

    public static function getUsersByTrainerId($trainer_id)
    {
        $users = DB::select('SELECT users.id, users.name, users.surname
                             FROM users
                             JOIN user_trainer_assignment ON users.id = user_trainer_assignment.user_id
                             WHERE user_trainer_assignment.personal_trainer_id = ?', [$trainer_id]);
        if($users){
            return $users;
        }
        return null;
    }

    public static function getTrainerByUserId($user_id)
    {
        $trainer = DB::select('SELECT users.id, users.name, users.surname
                             FROM users
                             JOIN user_trainer_assignment ON users.id = user_trainer_assignment.personal_trainer_id
                             WHERE user_trainer_assignment.user_id = ? LIMIT 1', [$user_id]);
        if($trainer){
            return $trainer[0];
        }
        return null;
    }   
}
