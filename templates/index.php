<h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.html" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox">
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                <?php foreach ($tasks as $item) : ?>
                    <tr class="tasks__item task 
                                <?= $item['completion_date'] ? 'task--completed' : '' ?>
                                <?= !$item['completion_date'] && task_near_finish($item['done_date']) ? 'task--important' : '' ?>
                              ">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1"
                                <?= $item['completion_date'] ? 'checked' : '' ?>
                                >
                                <span class="checkbox__text"><?= htmlspecialchars($item['task_name']); ?></span>
                            </label>
                        </td>

                        <td class="task__file">
                            <!-- исли имя файла в таблице пустое, то ссылку не выводим -->
                            <?= $item['file_name'] ? '<a class="download-link" href="'.$item['file_name'].'">'.$item['file_name'].'</a>' : '' ?>
                        </td>

                        <td class="task__date"><?= (htmlspecialchars($item['done_date']) != null) ? htmlspecialchars($item['done_date']) : 'Нет'; ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
