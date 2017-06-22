<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		header {
			background: #e3e3e3;
			padding: 2em;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<h1>
			<?= $greeting; ?>
		</h1>
	</header>
	<?php
	echo '<h2>while</h2>';	
	/* пример 1 */
    $i = 1;
    while ($i <= 10) {
        echo $i++;  /* выводится будет значение переменной
                       $i перед её увеличением
                       (post-increment) */
    }
    /* пример 2 */
	echo '<h2>while</h2>';	
    $i = 1;
    while ($i <= 10):
        echo $i;
        $i++;
    endwhile;
    echo '<h2>do while</h2>';	
    $i = 0;
    

        // Главное отличие от обычного цикла while в том, что первая итерация цикла do-while гарантированно выполнится
        $i = 0;
        do {
            echo $i;
        } while ($i > 0);

        // Каждое из выражений может быть пустым или содержать несколько выражений, разделенных запятыми.
        for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);

        // Если несколько элементов в объявлении массива используют одинаковый ключ, то только последний будет использоваться, а все другие будут перезаписаны.

        $array = array(
            1    => "a",
            "1"  => "b",
            1.5  => "c",
            true => "d",
        );
        var_dump($array);


    echo '<h2>Массивы в PHP могут содержать ключи типов integer и string</h2>';	
    // Массивы в PHP могут содержать ключи типов integer и string одновременно, так как PHP не делает различия между индексированными и ассоциативными массивами.
    $array = array(
        "foo" => "bar",
        "bar" => "foo",
        100   => -100,
        -100  => 100,
    );
    var_dump($array);
    echo '<h2>Индексированные массивы без ключа</h2>';	
    // Индексированные массивы без ключа
    $array = array("foo", "bar", "hallo", "world");
    var_dump($array);
    echo '<h2>Возможно указать ключ только для некоторых элементов и пропустить для других</h2>';	

    //Возможно указать ключ только для некоторых элементов и пропустить для других:
    $array = array(
             "a",
             "b",
        6 => "c",
             "d",
    );
    var_dump($array);

    //Доступ к элементам массива может быть осуществлен с помощью синтаксиса array[key].
    $array = array("foo" => "bar", 42    => 24, "multi" => array(
             "dimensional" => array(
                 "array" => "foo") )
    );
    var_dump($array["foo"]);
    var_dump($array[42]);
    var_dump($array["multi"]["dimensional"]["array"]);
    echo '<h2>Пример рекурсивного использования count()</h2>';	
    // Пример рекурсивного использования count()
    $food = array('fruits' => array('orange', 'banana', 'apple'),
                  'veggie' => array('carrot', 'collard', 'pea'));

    // рекурсивный count
    echo count($food, COUNT_RECURSIVE); // выводит 8
    echo '<h2>Пример использования count()</h2>';	
    // обычный count
    echo count($food); // выводит 2

    $categories = [
    ['id'=>1, 'name'=>'Computer', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>2, 'name'=>'Laptops', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>3, 'name'=>'Tablets', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>4, 'name'=>'Monitors', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>5, 'name'=>'Printers', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>6, 'name'=>'Scanners', 'parent_id'=>1, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>7, 'name'=>'Phones', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>8, 'name'=>'iPhone', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>9, 'name'=>'Speakers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>10, 'name'=>'Subwoofers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>11, 'name'=>'Amplifiers', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>12, 'name'=>'Players', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>13, 'name'=>'iPods', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>14, 'name'=>'TVs', 'parent_id'=>7, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>15, 'name'=>'Clothes', 'parent_id'=>0, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>16, 'name'=>'Jumpers', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>17, 'name'=>'Cardigans', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
    ['id'=>18, 'name'=>'Clothes', 'parent_id'=>15, 'sort_order'=>0, 'status'=>1 ],
];

	echo '<h2>Перебор массивов</h2>';	
    // Перебор массивов
    for ($i = 0; $i < count($categories); $i++)
        {
             echo $categories[$i]['id'].' '.$categories[$i]['parent_id'].' '.$categories[$i]['name'].'<br />';
        }


    echo '<h2>break прерывает выполнение текущей структуры for</h2>';	
	//break прерывает выполнение текущей структуры for, foreach, while, do-while или switch.
	//break принимает необязательный числовой аргумент, который сообщает ему выполнение какого количества вложенных структур необходимо прервать. Значение по умолчанию 1, только ближайшая структура будет прервана.
	$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');
	while (list(, $val) = each($arr)) {
	    if ($val == 'стоп') {
	        break;    /* Тут можно было написать 'break 1;'. */
	    }
	    echo "$val<br />\n";
	}
    echo '<h2>Использование дополнительного аргумента</h2>';	
    /* Использование дополнительного аргумента. */
	$i = 0;
	while (++$i) {
	    switch ($i) {
	    case 5:        echo "Итерация 5<br />\n";
	        break 1;  /* Выйти только из конструкции switch. */
	    case 10:         echo "Итерация 10; выходим<br />\n";
	        break 2;  /* Выходим из конструкции switch и из цикла while. */
	    default:        break;
	    }
	}
	echo '<h2>continue</h2>';	
	// continue
	$i = 0;
	while ($i++ < 5) {
	    echo "Снаружи<br />\n";
	    while (1) { echo "В середине<br />\n";
	        while (1) {  echo "Внутри<br />\n";
	            continue 3;
	        }
	        echo "Это никогда не будет выведено.<br />\n";
	    }
	    echo "Это тоже.<br />\n"; 
	}

	// Функции, определяемые пользователем 

	function foo($arg_1, $arg_2, /* ..., */ $arg_n)
	{
	    echo "Example function.\n";
	    return $retval;
	}

	// Можно вызывать функции PHP рекурсивно.
	function recursion($a)
	{
	    if ($a < 20) {
	        echo "$a\n";
	        recursion($a + 1);
	    }
	}
	//PHP поддерживает передачу аргументов по значению (по умолчанию), передачу аргументов по ссылке, и значения по умолчанию. 
    
    function takes_array($input)
    {
        echo "$input[0] + $input[1] = ", $input[0]+$input[1];
    }

    echo '<h2>Функция может определять значения по умолчанию</h2>';
    // Функция может определять значения по умолчанию в стиле C++ для скалярных аргументов, например:
    function makecoffee($type = "капуччино")    {
        return "Готовим чашку $type.\n";
    }
    echo makecoffee();
    echo makecoffee(null);
    echo makecoffee("эспрессо");
	// все аргументы, для которых установлены значения по умолчанию, должны находиться правее аргументов, для которых значения по умолчанию не заданы
	
    ?>


</body>
</html>