<?php

namespace App\Notifications;

use App\Models\Candidato;
use App\Models\Vacante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidatoNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vacante $vacante, Candidato $candidato)
    {
        $this->vacante = $vacante;
        $this->candidato = $candidato;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hola!')
            ->line('Has recibido un nuevo candidato en tu vacante.')
            ->line('La vacante es: ' . $this->vacante->titulo)
            ->action('Ver notificaciones', url('/candidatos/' . $this->vacante->id))
            ->line('Gracias por utiliza DevJobs!')
            ->salutation('Saludos,DevJobs');
    }

    public function toDatabase($notifiable)
    {
        return [
            'id_vacante' => $this->vacante->id,
            'nombre_vacante' => $this->vacante->titulo,
            'usuario_id' => $this->candidato->user_id,
        ];
    }
}
