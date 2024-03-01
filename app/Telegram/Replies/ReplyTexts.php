<?php

namespace App\Telegram\Replies;

class ReplyTexts
{
//    public const START_1 = "Hi runner.\nI can calculate two things:\n";
//    public const DEFAULT_1 = "Oops, invalid input. Example:\n";
//    public const DEFAULT_2 = "<code>0.4 4:30</code> - expected time for 400m (0.4) with pace 4:30\n";
//    public const DEFAULT_3 = "<code>22:40 5</code> - expected pace with result 22:40 for 5km";

    public const START_1 = "Привіт) я знаю дві прості команди\nя можу рахувати час для заданої дистанції і темпу:\n";
    public const DEFAULT_1 = "Йой, щось введено не вірно. Ось приклад правильних форматів:\n";
    public const DEFAULT_2 = "'<code>42.2 5:20</code>' - порахує час марафону (42.2) із темпом (5:20)\n";
    public const DEFAULT_2_2 = "'<code>0.4 4:30</code>' - порахує час для 400m (0.4) із темпом (4:30)\n";
    public const START_2 = "\nа також темп для часу і дистанції:\n";
    public const DEFAULT_3 = "'<code>1:51:00 21.1</code>' - порахує темп результату (1:51:00) для півмарафону (21.1)\n";
    public const DEFAULT_3_2 = "'<code>03:20 0.8</code>' - порахує темп результату (03:20 min) на (800m)";
}
