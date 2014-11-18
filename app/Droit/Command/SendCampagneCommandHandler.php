<?php namespace Droit\Command;

use Laracasts\Commander\CommandHandler;
use Droit\Newsletter\Worker\CampagneInterface;
use Droit\Exceptions\CampagneSendException;

class SendCampagneCommandHandler implements CommandHandler {

    protected $worker;

    public function __construct( CampagneInterface $worker)
    {
        $this->worker = $worker;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        // Get campagne
        $campagne = $this->worker->getCampagne($command->id);

        //set or update html
        $html = $this->worker->html($campagne->id);

        try
        {
            $this->worker->setHtml($html,$campagne->api_campagne_id);

            if($command->email)
            {
                $this->worker->sendTest($command->email,$campagne->api_campagne_id);
                $message = 'Email de test envoyé!';
            }
            else
            {
                $this->worker->sendCampagne($campagne->api_campagne_id);

                $campagne->status      = 'envoyé';
                $campagne->updated_at  = date('Y-m-d G:i:s');

                $campagne->save();

                $message = 'Campagne envoyé!';
            }

            return $message;
        }
        catch (Exception $e)
        {
            throw new \Droit\Exceptions\CampagneSendException('Problème avec l\'envoi', $e->getError() );
        }
    }

}