<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
/*
Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat',function(){
    return true;
});

Broadcast::channel('chat.{id}',function ($user, $id) {
  //dd($user->idutilisateurs , $id);
    return  (int)  $user->idutilisateurs ===  (int)   $id;
});
*/

Broadcast::channel('chat.{id}',function ($user, $id) {
  //dd($user->idutilisateurs , $id);
    return  (int)  $user->idutilisateurs ===  (int)   $id;
});

Broadcast::channel('App.Users.{id}', function ($user, $id) {
    return true;
});



