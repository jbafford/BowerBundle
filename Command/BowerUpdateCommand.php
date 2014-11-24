<?php

namespace Bafford\BowerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Process\ProcessBuilder;

class BowerUpdateCommand extends BowerInstallCommand
{
    protected function configure()
    {
        $this
            ->setName('bafford:bower:update')
            ->setDescription('Update Bower components')
        ;
    }
    
    /**
     * execute
     *
     * @param InputInterface  $input  instance
     * @param OutputInterface $output instance
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->installComponents($input, $output, 'update');
    }
}
