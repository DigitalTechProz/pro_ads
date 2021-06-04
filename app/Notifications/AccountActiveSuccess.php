<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccountActiveSuccess extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = $this->user;

        return (new MailMessage)
                ->subject('Your Account Is Successfully Activated!')
                ->greeting('Congrats '. $user->name.'!')
                ->line("Your email address has been successfully verified. Now you start to manage your crypto investments on our platform securely. The next step is to verify your Identity for KYC Policy. ")
                ->line("Once the KYC verification is complete we remove all restrictions to your account. You can submit your Proof of Identinty & Resedential Address on your dashboard. Click login now button below to login and edit your profile and also upload your docs. Then Click Submit Verification Button. ")
                ->action('Login Now', route('login'))
                ->line(' If you face any problem feel free to contact us anytime.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
