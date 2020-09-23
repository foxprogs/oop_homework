<?php

namespace Lesson3;

interface Reader
{
    public function read(): array;
}

interface Writer
{
    public function write(array $data);
}

interface Converter
{
    public function convert($item);
}

class Import
{
    public $reader;
    public $writer;
    public $converters;

    public function from(Reader $reader)
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(Writer $writer)
    {
        $this->writer = $writer;
        return $this;
    }
    
    public function with(Converter $converter)
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute()
    {
        $write_data = [];
        foreach ($this->reader->read() as $item) {
            foreach ($this->converters as $converter) {
                $item = $converter->convert($item);
            }
            $write_data[] = $item;
        }
        $this->writer->write($write_data);
    }
}

class FileReader implements Reader
{
    public function read(): array
    {
        return [
            [
                'time' => '02.02.2020 11:20',
                'price' => '1.500,00',
                'name' => 'Dress',
            ],
            [
                'time' => '02.07.2020 12:55',
                'price' => '780,00',
                'name' => 'Shirt',
            ],
            [
                'time' => '11.01.2020 13:30',
                'price' => '300,00',
                'name' => 'Slippers',
            ],
        ];
    }
}

class DatabaseWriter implements Writer
{
    public function write(array $data)
    {
        $sql = "INSERT INTO `products` (`created_at`, `price`, `name`)
            VALUES ";
            $values = [];
        foreach ($data as $item) {
            $values[] = '("' . implode('", "', $item) . '")';
        }
        $sql .= implode(', ', $values);
        echo $sql;
    }
}

class DateFormatConverter implements Converter
{
    public function convert($item)
    {
        $item['time'] = date("Y-m-d H:i:s", strtotime($item['time']));
        return $item;
    }
}

class PriceConverter implements Converter
{
    public function convert($item)
    {
        $item['price'] = str_replace('.', '', substr($item['price'], 0, -3));
        return $item;
    }
}


(new Import())
->from(new FileReader())
->to(new DatabaseWriter())
->with(new DateFormatConverter())
->with(new PriceConverter())
->execute();
