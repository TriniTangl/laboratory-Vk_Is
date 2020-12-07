% Lab5_ScriptStart.m
% Стартовий Script-файл

% Автор Кононенко О.В.
% Дата 01.06.2020
% ЧДТУ, ФІТІС

Lab5_ScriptCleaner;
selectedMenuOption = menu('Що робити?', 'Розпочати виконання скрипта', 'Завершити роботу');
if selectedMenuOption == 1
    while selectedMenuOption == 1
        Lab5_ScriptInput;
        Lab5_ScriptWorker;
        selectedMenuOption = menu('Що робити?', 'Продовжити виконання скрипта', 'Завершити роботу');
        Lab5_ScriptCleaner;
    end
end
Lab5_ScriptCleaner;
clear selectedMenuOption;
