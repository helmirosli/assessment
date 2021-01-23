<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'plan',
        'servers'
    ];


    public function subscribe($plan)
    {
        print "Action: Subscribing to Plan " . $plan->name . " ...\n";
        $this->plan = $plan;
        print "Subscribed to plan " . $plan->name . "\n\n";
    }

    public function connectServer(Server $server)
    {
        print "Action: Connecting Server " . $server->name . " ...\n";
        $plan = $this->plan;
        $servers = $this->servers ? $this->servers : [];

        if ($plan && $servers) {
            if ($plan->name == 'Basic Plan' && count($servers) > 0) {
                print "Error => User Exceeded Server Limit allowed for plan Basic Plan ! \n\n";
                return;
            }
        } elseif (!$plan) {
            print "Error => User is not Subscribed to Any Plan \n\n";
            return;
        }

        // checking existing ip
        $_tracking = 0;
        foreach ($servers as $_server) {
            if ($_server->ipAddress == $server->ipAddress) {
                $_tracking = 1;
            }
        }

        if ($_tracking == 0) {
            $servers[] = $server;
        }
        $this->servers = $servers;

        print "Action => Server " . $server->name . " is connected !\n\n";

        print "+++ User's Name       : " . $this->name . "\n";
        print "+++ Current Plan      : " . $this->plan->name . "\n";
        print "+++ Connected Servers : ";

        foreach ($this->servers as $index => $_server) {
            if ($index > 0) {
                print " , ";
            }
            print $_server->name . ' [' . $_server->ipAddress . ']';
        }

        print "\n\n";
    }

    public function unsubscribe()
    {
        $plan = $this->plan;
        print "Action: Cancelling Subscription to plan " . $plan->name . " ...\n\n";

        $this->plan = null;
        $this->servers = null;

        print "Your have successfully unsubscribed from plan " . $plan->name . ". \n";
        print "Thank you for using RunCloud. \n\n";
    }
}
