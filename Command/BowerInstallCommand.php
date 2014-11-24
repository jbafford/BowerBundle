<?php

namespace Bafford\BowerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputOption,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Process\ProcessBuilder;

class BowerInstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('bafford:bower:install')
            ->setDescription('Install Bower components')
        ;
    }
    
    protected function installComponents(InputInterface $input, OutputInterface $output, $command)
    {
        $container = $this->getContainer();
        $dir = $container->getParameter('kernel.root_dir') . '/../';
        
        $args = [
            $container->getParameter('bafford_bower.bower_path'),
            $command,
        ];
        
    	$pb = new ProcessBuilder($args);
    	$pb->setWorkingDirectory($dir);
    	
    	$proc = $pb->getProcess();
    	$proc->run();
    	
        if(!$proc->isSuccessful())
            throw new \Exception($proc->getCommandLine() . ': ' . trim($proc->getErrorOutput()));
        
        $output->write($proc->getOutput());
    }
    
    /**
     * execute
     *
     * @param InputInterface  $input  instance
     * @param OutputInterface $output instance
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->installComponents($input, $output, 'install');
    }
}
