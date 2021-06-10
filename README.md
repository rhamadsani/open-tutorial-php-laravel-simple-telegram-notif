# Laravel Simple Telegram Notif Service

- Add Folder Services in "App"
- Copy this file "Telegram.php"

# How To Use

1. change this with your own token 

    `$token = "yourtoken";`
     how to get token please visit official website https://core.telegram.org/bots/api
2. Import to your controller or aplication
     `Use App\Services\Telegram;`

3. Send Message 
    `$newMessage = "Halo this is a Message";`
    `$chatId = "-580610654";`
    ` Telegram::sendMessage($chatId, 'html', $newMessage);`
        - to get chatId you need create a bot from your telegram 
        - start message to bot or add into group 
        - see the list of boot chat from https://api.telegram.org/bot{yourtokenhere}/getUptdates 

