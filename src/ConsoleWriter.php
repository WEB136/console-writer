<?php


namespace web136\console_writer;


class ConsoleWriter
{


    /**
     * Маркер окончания раскрашенной строки
     */
    const COLORIZE_END = "\e[0m";

    const COLOR_BLACK = 'black';
    const COLOR_RED = 'red';
    const COLOR_GREEN = 'green';
    const COLOR_YELLOW = 'yellow';
    const COLOR_CYAN = 'cyan';
    const COLOR_PURPLE = 'purple';
    const COLOR_BLUE = 'blue';

    /**
     * Каталог доступных цветов
     * @var string[]
     */
    protected static $colors = [
        "black"  => "\e[0;30m",
        "red"    => "\e[0;31m",
        "green"  => "\e[0;32m",
        "yellow" => "\e[0;33m",
        "blue"   => "\e[0;34m",
        "purple" => "\e[0;35m",
        "cyan"   => "\e[0;36m",
        "white"  => "\e[0;37m",
    ];

    /**
     * Пишет сообщение цвета red в php://stderr
     * @param string $message
     */
    public static function writeError($message = '')
    {
        file_put_contents(
            'php://stderr',
            self::colorizeMessage(
                $message,
                self::COLOR_RED
            ) . "\n"
        );
    }

    /**
     * Добавляет к сообщению маркеры цвета.
     * @param string $message
     * @param string $color
     * @return string
     */
    protected static function colorizeMessage($message = '', $color = '')
    {
        $localColorizeStart = self::$colors[strtolower($color)];

        if ($localColorizeStart) {
            $message = $localColorizeStart . $message . self::COLORIZE_END;
        }

        return $message;
    }

    /**
     * Выводит сообщение цвета green в php://stdout
     * @param string $message
     */
    public static function writeSuccess($message = '')
    {
        self::writeInfo(
            $message,
            self::COLOR_GREEN
        );
    }

    /**
     * Выводит сообщение любого из доступных в классе цветов. Если не указан цвет или указан некорректный к выводу добавится
     * только новая строка
     * @param string $message
     * @param string $color
     */
    public static function writeInfo($message = '', $color = '')
    {
        file_put_contents(
            'php://stdout',
            self::colorizeMessage(
                $message,
                $color
            ) . "\n"
        );
    }

    /**
     * Выводит сообщение цвета yellow в php://stdout
     * @param string $message
     */
    public static function writeWarning($message = '')
    {
        self::writeInfo(
            $message,
            self::COLOR_YELLOW
        );
    }

}
