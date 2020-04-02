<?php

namespace Channels\Postbuffer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Channels\Postbuffer\Models\Channel as ChannelModel;

class ChannelWorkflow extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The channel instance.
     *
     * @var Channel
     */
    protected $channel;

    /**
     * The channel instance.
     *
     * @var Channel
     */
    protected $workflow;

   
    /**
     * Next Step for the workflow.
     *
     * @var Step
     */
    protected $step;

    /**
     * Create a new notification instance.
     *
     * @param Channel $channel
     * @param String $step
     *
     * @return void
     */
    public function __construct(ChannelModel $channel, array $workflow, String $step)
    {
        $this->channel         = $channel;
        $this->workflow     = $workflow;
        $this->step         = $step;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param   mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param   mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return $this->{$this->step}();
    }

    /**
     * Get the mail representation of the completed notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function complete()
    {
        $message = new MailMessage;
        $message->greeting("Hi {$this->channel->reporting->name}!");
        $message->line("The channel [{$this->channel->title}] has been completed successfully.");

        foreach ($this->workflow as $key => $value) {
            if ($key == 0) {
                $message->action($value->action, url('workflows/workflow/' . $value->id));
                continue;
            }
            $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
        }

          
        return $message;
    }

    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function verify()
    {
            $message = new MailMessage;
            $message->greeting("Hi {$this->channel->reporting->name}!");
            $message->line("The channel {$this->channel->titile} has been verified successfully.");           
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }

    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function approve()
    {
            $message = new MailMessage;
            $message->greeting("Hi {$this->channel->reporting->name}!");
            $message->line("The channel {$this->channel->titile} has been approved successfully.");           
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }

    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function publish()
    {
            $message = new MailMessage;
            $message->greeting("Hi {$this->channel->reporting->name}!");
            $message->line("The channel {$this->channel->titile} has been published successfully.");            
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }

    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function unpublish()
    {
            $message = new MailMessage;;
            $message->greeting("Hi {$this->channel->reporting->name}!");
            $message->line("The channel {$this->channel->titile} has been unpublished successfully.");            
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }

    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function archive()
    {
            $message = new MailMessage;;
            $message->greeting("Hi {$this->channel->reporting->name}!");
            $message->line("The channel {$this->channel->titile} has been archived successfully.");            
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }
    /**
     * Get the mail representation of the publish notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function cancel()
    {
            $message = new MailMessage;;
            $message->greeting("Hi {$this->channel->user->name}!");
            $message->line("The channel {$this->channel->titile} has been cancelled successfully.");            
            foreach ($this->workflow as $key => $value) {
                if ($key == 0) {
                    $message->action($value->action, url('workflows/workflow/' . $value->id));
                    continue;
                }
                $message->line('<a href="'.url('workflows/workflow/' . $value->id).'">'.$value->action.'</a>');
            }

            return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param   mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name'      => $this->channel->title,
            'user'      => $notifiable->name,
            'action'    => $this->channel->status,
            'next'      => [
                'actionText'      => $this->{$this->step}()->actionText,
                'actionUrl'       => $this->{$this->step}()->actionUrl,
            ]

        ];
    }
}
