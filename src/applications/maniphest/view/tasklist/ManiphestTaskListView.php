<?php

/*
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class ManiphestTaskListView extends AphrontView {

  private $tasks;
  private $handles;

  public function setTasks(array $tasks) {
    $this->tasks = $tasks;
    return $this;
  }

  public function setHandles(array $handles) {
    $this->handles = $handles;
    return $this;
  }

  public function render() {

    $views = array();
    foreach ($this->tasks as $task) {
      $view = new ManiphestTaskSummaryView();
      $view->setTask($task);
      $view->setHandles($this->handles);
      $views[] = $view->render();
    }

    return
      '<div style="padding: 1em;">'.
        implode("\n", $views).
      '</div>';
  }

}
