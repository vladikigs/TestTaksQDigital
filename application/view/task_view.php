<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="container d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card px-3">
                    <div class="card-body">

                        <h4 class="card-title">Awesome Todo list</h4>
                        <div class="add-items border-bottom">
                            <form class="d-flex" action="/task/addTask/" method="post">
                                <input type="text" name="description" class="form-control todo-list-input" placeholder="What do you need to do today?">
                                <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">Add</button>
                            </form>
                            <div class="mt-2 block-ruby">
                                <form class="d-flex" action="/task/allTasksCompleted/" method="post">
                                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn ml-auto">Ready all</button>
                                </form>
                                <form class="d-flex" action="/task/deleteAllTasks/" method="post">
                                    <button class="add btn btn-primary font-weight-bold todo-list-add-btn btn-danger ml-auto">Remove all</button>
                                </form>
                            </div>
                        </div>

                        <div class="list-wrapper">
                            <ul class="d-flex flex-column todo-list">
                                <?php
                                    foreach ($data as $value) {
                                        $status = ($value->isDone) ? 'Ready' : 'Still in progress';
                                        $btnStatus = ($value->isDone) ? 'Unready' : 'Ready';
                                        $btnStatusEditUrl = ($value->isDone) ? '/task/unready' : '/task/ready';
                                        echo '<li class="border-bottom">
                                                <div class="form-check"> <label class="form-check-label"> <input class="checkbox" type="checkbox">'.htmlspecialchars($value->taskDescription).'
                                                    <div class="block-ruby">
                                                        <form action="'.$btnStatusEditUrl.'" method="post">
                                                            <input type="hidden" name="id" value="'.$value->id.'">
                                                            <button type="submit" class="add btn btn-primary font-weight-bold todo-list-add-btn">'.$btnStatus.'</button>
                                                        </form>
                                                        <form action="/task/delete" method="post">
                                                            <input type="hidden" name="id" value="'.$value->id.'">
                                                            <button class="add btn btn-primary font-weight-bold todo-list-add-btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                    <i class="input-helper"></i></label> </div> <i class="status">'.$status.'</i>
                                            </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>