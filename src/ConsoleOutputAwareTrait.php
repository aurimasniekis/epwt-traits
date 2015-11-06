<?php

namespace EPWT\Traits;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Trait ConsoleOutputAwareTrait
 * @package EPWT\Traits
 * @author Aurimas Niekis <aurimas.niekis@gmail.com>
 */
trait ConsoleOutputAwareTrait
{
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @return OutputInterface
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param OutputInterface $output
     *
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Writes a message to the output.
     *
     * @param string|array $messages The message as an array of lines or a single string
     * @param bool         $newline  Whether to add a newline
     * @param int          $type     The type of output (one of the OUTPUT constants)
     *
     * @throws \InvalidArgumentException When unknown output type is given
     */
    public function write($messages, $newline = false, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $output = $this->getOutput();

        if (null !== $output) {
            $output->write($messages, $newline, $type);
        }
    }

    /**
     * Writes a message to the output and adds a newline at the end.
     *
     * @param string|array $messages The message as an array of lines or a single string
     * @param int          $type     The type of output (one of the OUTPUT constants)
     *
     * @throws \InvalidArgumentException When unknown output type is given
     */
    public function writeln($messages, $type = OutputInterface::OUTPUT_NORMAL)
    {
        $output = $this->getOutput();

        if (null !== $output) {
            $output->writeln($messages, $type);
        }
    }
}
