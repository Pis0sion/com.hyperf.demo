<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Hyperf\Devtool;

use Hyperf\Command\Annotation\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @Command
 */
class InfoCommand extends SymfonyCommand
{
    /**
     * @var Info
     */
    private $info;

    public function __construct(Info $info)
    {
        parent::__construct('info');
        $this->info = $info;
    }

    protected function configure()
    {
        $this->setDescription('Dump the server info.')->addArgument('type', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $type = $input->getArgument('type');
        if (! $this->info->has($type)) {
            $output->writeln(sprintf('<error>Error</error> Info type [%s] not exist.', $type));
        }
        $adapter = $this->info->get($type);
        $adapter->execute($input, $output);
    }
}
