<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Notifications\Invitation;
use Illuminate\Support\Facades\URL;

class DashboardComponent extends Component
{
    public $show = false;
    public $name, $email;
    public $password = NULL;

    public function openModal()
    {
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function store()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'tenant-admin'
        ]);

        $url = URL::signedRoute('invitation', $user);
        $user->notify(new Invitation($url)); // Send invitation
        session()->flash('message', 'User has been created successfully');
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.admin.dashboard-component');
    }
}
