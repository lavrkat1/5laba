<?php
    require_once('php_excel/Classes/PHPExcel.php');
    require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

    $mysqli = new mysqli("localhost", "f0474070_root", "root", "f0474070_games");
    if ($mysqli->connect_errno){
        echo "Не удалось подключиться к БД";
    }

    // Запрос на выборку сведений о пользователях
    $result = $mysqli->query("SELECT
        games1.games_name as game_name,
        games1.games_genre as game_genre,
        games1.games_developer as game_developer,
        games1.games_publisher as game_publisher,
        kluch.kluch_name,
        kluch.kluch_date,
        kluch.kluch_date_end,
        stores.stores_url as url
        FROM kluch
        LEFT JOIN games1 ON kluch.id_games=games1.id_games
        LEFT JOIN stores ON kluch.id_stores=stores.id_stores"
    );

    $xls = new PHPExcel();
    // Устанавливаем индекс активного листа
    $xls->setActiveSheetIndex(0);
    // Получаем активный лист
    $sheet = $xls->getActiveSheet();
    // Подписываем лист
    $sheet->setTitle('Игры');
    // Вставляем текст в ячейку A1
    $sheet->setCellValue("A1", 'Игры');
    $sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
    // Объединяем ячейки
    $sheet->mergeCells('A1:I1');
    // Выравнивание текста
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $c = 0;

    $header = array("п/п","Название","Жанр","Разработчик","Издатель","Ключ","Дата приобретения","Дата окончания","URL магазина");
    foreach ($header as $h){
        $sheet->setCellValueByColumnAndRow($c,2,$h);
        // Применяем выравнивание
        $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
        $c++;
    }

    if ($result){
        $r = 3;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
            $c++;

            foreach ($row as $cell){
                if ($c==6 || $c==7){
                    $cell = date('d-m-Y', strtotime($cell));
                }
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
    }

    header('Content-Type: application/xls');
    header('Content-Disposition: inline; filename=Games.xls');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');

    $objWriter = new PHPExcel_Writer_Excel5($xls);
    $objWriter->save('php://output');
?>