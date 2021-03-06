<?php
require('partials/header.view.php');
?>


        <div class="breadcrumb">
            <div><a href="/index">Home</a></div>/<div><a href="/dashboard">Dashboard</a></div>/<div><a href="/manager">Manager</a></div>
        </div>
        <br>

        <div class="title">
  <h1> <?php echo $_SESSION['username'] ?>, welcome to your task manager.</h1>
</div>
<main>
  <div id="listSelect">
    <h3>Select one of your task lists:</h3><br>
    <label for="listSelection">List Selection: </label>
      <form action="/manager" method="post">
        <select name="listSelection" id="listSelection" cont="Select List">
          <?php 
          foreach ($lists as $list) { ?>
              <option value="<?= $list; ?>"><?= $list; ?></option>
              <?php } ?>
        </select>
        <button type="submit">Show Tasks</button>
      </form>

      <?php if ($tasks != NULL) : ?>
        <table>
          <?php 
          foreach ($tasks as $rowTask) { ?>
            <tr>
                <td><?=  $rowTask ; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['currentList'])) : { ?>
          <div id="taskTable">
            <h3>Create a new task for the selected list:</h3>
            <form action="manager/taskcreation" method="post">
              <label for="taskname">Task Name</label>
              <input type="text" name="taskname" id="taskname">
              <button type="submit">Create Task</button>
            </form><br>
        <?php }
      endif; ?>
          
  </div>
  <div id="createListForm">
    <form action="manager/listcreation" method="post">
      <label for="listname">Create a new task List</label><br>
      <input type="text" name="listname" placeholder="List Name" id="listname"></input>
      <button type="submit">Create List</button>
    </form>
  </div>
</main>