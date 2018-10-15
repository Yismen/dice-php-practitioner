<?php view('layouts.header'); ?>
<section class="container">
    <form action="/clients" method="post">

        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Name</label>
                    <p class="control">
                        <input class="input" type="text" name="name" placeholder="Text input">
                    </p>
                </div>
                <!-- ./ Field Name -->
            </div>
            <div class="column is-6">                
                <div class="block">
                    <button type="submit" class="button is-primary is-large is-outlined">Send</button>
                </div>
            </div>
        </div>
    </form>
</section>

<hr>

<section class="container">
    <header class="is-centered">Clients</header>
    <table class="table ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client->id ?></td>
                    <td><?php echo $client->name ?></td>
                    <td><?php echo $client->slug ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
           
</section>
    

<?php view('layouts.footer') ?>