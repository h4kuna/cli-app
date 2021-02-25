<?php declare(strict_types=1);

namespace h4kuna\Cli\App\Commands\Tools\Debugger;

use Nette\Http\IRequest;
use Nette\Mail\Mailer;
use Nette\Mail\Message;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Mail extends Command
{
	protected static $defaultName = 'tools:debugger:mail';

	/** @var array{email: string, from: ?string} */
	private $config;

	/** @var Mailer */
	private $mailer;

	/** @var IRequest */
	private $request;


	public function __construct(array $config, Mailer $mailer, IRequest $request)
	{
		parent::__construct();
		$this->config = $config;
		$this->mailer = $mailer;
		$this->request = $request;
	}


	protected function execute(InputInterface $input, OutputInterface $output): ?int
	{
		$from = $this->mailFrom();
		$to = $this->config['email'];

		$message = new Message();
		$message->addTo($to);
		$message->setFrom($from);
		$message->setSubject('Test: Příliš žluťoučký kůň úpěl ďábelské ódy.');
		$message->setHtmlBody("Dobrý den,\ntestovací email.\n<b>Příliš žluťoučký kůň úpěl ďábelské ódy.</b>");

		$this->mailer->send($message);

		$output->writeln(sprintf('Send from "%s" to "%s".', $from, $to));

		return self::SUCCESS;
	}


	private function mailFrom(): string
	{
		if (isset($this->config['from']) && $this->config['from'] !== '') {
			return $this->config['from'];
		}
		return 'info@' . $this->request->getUrl()->getHost();
	}

}
