<?php

use CodeIgniter\Events\Events;
use CodeIgniter\Events\EventInterface;

class SessionExpirationListener implements \CodeIgniter\Events\EventsListenerInterface
{
    public function handle(EventInterface $event)
    {
        // Update database to set IsLoggedIn to false
        $userId = session()->get('Identity'); // Assuming you store user ID in session
        $db = db_connect();
        $updateData = [
            'IsLoggedIn' => false
        ];
        $db->table('logindetails')->where('Identity', $userId)->update($updateData);
    }
}