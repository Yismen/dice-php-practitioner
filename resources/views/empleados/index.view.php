<?php view('layouts.header'); ?>
<section class="container">
    <header class="is-centered">Empleados</header>
    <table class="table ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?php echo $empleado->EmployeeID ?></td>
                    <td><?php echo $empleado->Unique_Name ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

        <!-- <?php var_dump($empleados) ?> -->
           
</section>
    

<?php view('layouts.footer') ?>