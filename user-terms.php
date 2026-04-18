<?php
declare(strict_types=1);

$title = 'Условия пользования сайтом Project.Enterprises';
$filenameBase = 'usloviya-polzovaniya-project-enterprises';
$supportEmail = 'support@project.enterprises';

$sections = [
    [
        'heading' => '1. Общие положения',
        'paragraphs' => [
            'Настоящие условия регулируют использование информационного сайта "Project.Enterprises", посвященного Санкт-Петербургу, его истории, достопримечательностям и известным людям.',
            'Использование сайта означает согласие пользователя с настоящими условиями. Если пользователь не согласен с отдельными положениями, ему следует прекратить использование сайта.',
            'Сайт носит ознакомительный и образовательный характер и предназначен для просмотра материалов через персональный компьютер, планшет или смартфон с доступом в интернет.',
        ],
    ],
    [
        'heading' => '2. Доступ к сайту и учетной записи',
        'paragraphs' => [
            'Просмотр основных материалов сайта доступен посетителям в рамках действующего функционала проекта.',
            'Для регистрации пользователь указывает имя, адрес электронной почты и пароль. Пользователь обязуется предоставлять достоверные данные и не передавать свою учетную запись третьим лицам.',
            'Пользователь самостоятельно отвечает за сохранность логина и пароля, а также за все действия, совершенные под его учетной записью.',
        ],
    ],
    [
        'heading' => '3. Правила использования материалов',
        'paragraphs' => [
            'Все тексты, изображения и иные материалы сайта предназначены для личного, некоммерческого ознакомления.',
            'Копирование, массовое распространение, публикация на сторонних ресурсах или коммерческое использование материалов без согласия правообладателя не допускаются.',
            'При цитировании или использовании материалов в учебных целях рекомендуется указывать источник: сайт "Project.Enterprises".',
        ],
    ],
    [
        'heading' => '4. Обязанности и ограничения для пользователя',
        'paragraphs' => [
            'Пользователю запрещается предпринимать попытки несанкционированного доступа к сайту, учетным записям, базе данных, серверной части и административным разделам.',
            'Запрещается размещать или передавать через сайт вредоносный код, автоматизированные запросы, спам, а также совершать действия, способные нарушить стабильную работу ресурса.',
            'Пользователь не должен использовать сайт для нарушения законодательства, распространения недостоверной информации или выдачи себя за другое лицо.',
        ],
    ],
    [
        'heading' => '5. Персональные данные и безопасность',
        'paragraphs' => [
            'Сайт может обрабатывать регистрационные данные пользователя, включая имя и адрес электронной почты, исключительно для обеспечения работы учетной записи и базовой коммуникации с пользователем.',
            'Сайт не запрашивает и не хранит платежные данные пользователя.',
            'Пользователю рекомендуется использовать сложный пароль, не сообщать его третьим лицам и завершать сеанс работы после использования сайта на общедоступных устройствах.',
        ],
    ],
    [
        'heading' => '6. Технические условия использования',
        'paragraphs' => [
            'Для корректной работы сайта рекомендуется использовать современный браузер и стабильное подключение к интернету.',
            'Администрация сайта вправе проводить технические работы, обновления и обслуживание, что может временно ограничить доступ к отдельным страницам или функциям.',
            'Работа скачивания документов и открытия ссылок может зависеть от настроек браузера, операционной системы и установленного офисного программного обеспечения пользователя.',
        ],
    ],
    [
        'heading' => '7. Скачивание документа с условиями',
        'paragraphs' => [
            'При нажатии на ссылку "Условия пользователя" в нижней части сайта пользователю предоставляется файл Word с актуальной редакцией настоящих условий.',
            'Если документ не скачивается, пользователю следует проверить разрешения браузера на загрузку файлов и повторить попытку позднее.',
        ],
    ],
    [
        'heading' => '8. Техническая поддержка',
        'paragraphs' => [
            'По вопросам работы сайта пользователь может обратиться в техническую поддержку по адресу: ' . $supportEmail . '.',
            'При обращении рекомендуется указать страницу, на которой возникла проблема, кратко описать ошибку и при необходимости приложить скриншоты.',
        ],
    ],
    [
        'heading' => '9. Заключительные положения',
        'paragraphs' => [
            'Администрация сайта вправе обновлять настоящие условия без отдельного предварительного уведомления, если это необходимо для поддержки работы проекта или приведения его в соответствие с актуальными требованиями.',
            'Продолжение использования сайта после публикации обновленной редакции условий означает согласие пользователя с внесенными изменениями.',
        ],
    ],
];

function escapeXml(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_XML1, 'UTF-8');
}

function makeWordParagraph(
    string $text,
    bool $bold = false,
    string $align = 'both',
    bool $firstLineIndent = true,
    int $fontSize = 24,
    int $spaceBefore = 0,
    int $spaceAfter = 0,
    int $lineHeight = 360,
    string $fontName = 'Times New Roman'
): string
{
    $escaped = escapeXml($text);
    $indentXml = $firstLineIndent
        ? '<w:ind w:firstLine="708"/>'
        : '<w:ind w:firstLine="0"/>';
    $runProps = '<w:rPr>'
        . '<w:rFonts w:ascii="' . escapeXml($fontName) . '" w:hAnsi="' . escapeXml($fontName) . '" w:eastAsia="' . escapeXml($fontName) . '" w:cs="' . escapeXml($fontName) . '"/>'
        . '<w:sz w:val="' . $fontSize . '"/>'
        . '<w:szCs w:val="' . $fontSize . '"/>'
        . '<w:lang w:val="ru-RU"/>';

    if ($bold) {
        $runProps .= '<w:b/>';
    }

    $runProps .= '</w:rPr>';

    $paragraphProps = '<w:pPr>'
        . '<w:jc w:val="' . escapeXml($align) . '"/>'
        . $indentXml
        . '<w:spacing w:before="' . $spaceBefore . '" w:after="' . $spaceAfter . '" w:line="' . $lineHeight . '" w:lineRule="auto"/>'
        . '</w:pPr>';

    if ($text === '') {
        return '<w:p>' . $paragraphProps . '</w:p>';
    }

    return '<w:p>' . $paragraphProps . '<w:r>' . $runProps . '<w:t xml:space="preserve">' . $escaped . '</w:t></w:r></w:p>';
}

function buildDocumentXml(string $title, array $sections): string
{
    $paragraphs = [];
    $paragraphs[] = makeWordParagraph($title, true, 'center', false, 28, 0, 120);
    $paragraphs[] = makeWordParagraph('Документ сформирован для сайта Project.Enterprises.', false, 'center', false, 24, 0, 120);
    $paragraphs[] = makeWordParagraph('');

    foreach ($sections as $section) {
        $paragraphs[] = makeWordParagraph($section['heading'], true, 'left', false, 24, 120, 60);

        foreach ($section['paragraphs'] as $paragraph) {
            $paragraphs[] = makeWordParagraph($paragraph);
        }

        $paragraphs[] = makeWordParagraph('');
    }

    return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<w:document xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">'
        . '<w:body>'
        . implode('', $paragraphs)
        . '<w:sectPr>'
        . '<w:pgSz w:w="11906" w:h="16838"/>'
        . '<w:pgMar w:top="1134" w:right="850" w:bottom="1134" w:left="1701" w:header="708" w:footer="708" w:gutter="0"/>'
        . '<w:cols w:space="708"/>'
        . '<w:docGrid w:linePitch="360"/>'
        . '</w:sectPr>'
        . '</w:body>'
        . '</w:document>';
}

function buildDocxBinary(string $title, array $sections): ?string
{
    if (!class_exists('ZipArchive')) {
        return null;
    }

    $tempFile = tempnam(sys_get_temp_dir(), 'terms_');

    if ($tempFile === false) {
        return null;
    }

    $createdAt = gmdate('Y-m-d\TH:i:s\Z');
    $documentXml = buildDocumentXml($title, $sections);

    $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
        . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
        . '<Default Extension="xml" ContentType="application/xml"/>'
        . '<Override PartName="/docProps/app.xml" ContentType="application/vnd.openxmlformats-officedocument.extended-properties+xml"/>'
        . '<Override PartName="/docProps/core.xml" ContentType="application/vnd.openxmlformats-package.core-properties+xml"/>'
        . '<Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>'
        . '</Types>';

    $rootRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
        . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>'
        . '<Relationship Id="rId2" Type="http://schemas.openxmlformats.org/package/2006/relationships/metadata/core-properties" Target="docProps/core.xml"/>'
        . '<Relationship Id="rId3" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/extended-properties" Target="docProps/app.xml"/>'
        . '</Relationships>';

    $appXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Properties xmlns="http://schemas.openxmlformats.org/officeDocument/2006/extended-properties" xmlns:vt="http://schemas.openxmlformats.org/officeDocument/2006/docPropsVTypes">'
        . '<Application>Project.Enterprises</Application>'
        . '</Properties>';

    $coreXml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<cp:coreProperties xmlns:cp="http://schemas.openxmlformats.org/package/2006/metadata/core-properties" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:dcmitype="http://purl.org/dc/dcmitype/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">'
        . '<dc:title>' . escapeXml($title) . '</dc:title>'
        . '<dc:creator>Project.Enterprises</dc:creator>'
        . '<cp:lastModifiedBy>Project.Enterprises</cp:lastModifiedBy>'
        . '<dcterms:created xsi:type="dcterms:W3CDTF">' . $createdAt . '</dcterms:created>'
        . '<dcterms:modified xsi:type="dcterms:W3CDTF">' . $createdAt . '</dcterms:modified>'
        . '</cp:coreProperties>';

    $zip = new ZipArchive();
    $opened = $zip->open($tempFile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    if ($opened !== true) {
        @unlink($tempFile);
        return null;
    }

    $zip->addFromString('[Content_Types].xml', $contentTypes);
    $zip->addFromString('_rels/.rels', $rootRels);
    $zip->addFromString('docProps/app.xml', $appXml);
    $zip->addFromString('docProps/core.xml', $coreXml);
    $zip->addFromString('word/document.xml', $documentXml);
    $zip->close();

    $binary = file_get_contents($tempFile);
    @unlink($tempFile);

    return $binary === false ? null : $binary;
}

function buildWordHtml(string $title, array $sections): string
{
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40"><head><meta charset="UTF-8"><title>'
        . $safeTitle
        . '</title><style>'
        . '@page{margin:2cm 1.5cm 2cm 3cm;}'
        . 'body{font-family:"Times New Roman",serif;font-size:12pt;line-height:1.5;margin:0;}'
        . 'h1{font-size:14pt;font-weight:700;text-align:center;margin:0 0 12pt;}'
        . 'h2{font-size:12pt;font-weight:700;margin:18pt 0 8pt;}'
        . 'p{margin:0 0 10pt;text-align:justify;text-indent:1.25cm;}'
        . '.meta{margin:0 0 12pt;text-align:center;text-indent:0;}'
        . '</style></head><body>';

    $html .= '<h1>' . $safeTitle . '</h1>';
    $html .= '<p class="meta">Документ сформирован для сайта Project.Enterprises.</p>';

    foreach ($sections as $section) {
        $html .= '<h2>' . htmlspecialchars($section['heading'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</h2>';

        foreach ($section['paragraphs'] as $paragraph) {
            $html .= '<p>' . htmlspecialchars($paragraph, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        }
    }

    return $html . '</body></html>';
}

while (ob_get_level() > 0) {
    ob_end_clean();
}

$docxBinary = buildDocxBinary($title, $sections);

if ($docxBinary !== null) {
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="' . $filenameBase . '.docx"');
    header('Content-Length: ' . strlen($docxBinary));
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');
    header('X-Content-Type-Options: nosniff');

    echo $docxBinary;
    exit;
}

$fallbackHtml = buildWordHtml($title, $sections);

header('Content-Type: application/msword; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filenameBase . '.doc"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
header('X-Content-Type-Options: nosniff');

echo $fallbackHtml;
