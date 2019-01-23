@extends('layouts.app')

@section('content')
<div class="container"> 

<h1> <?php echo $title; ?></h1>
<table class="table table-bordered table-stripped">

<thead>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>
    </tr>
</thead>

<tbody>

<?php foreach( $ebooks as $ebook ): ?>
    <tr>
        <td><?php echo $ebook['id']; ?></td>
        <td><?php echo $ebook['title']; ?></td>
        <td><?php echo $ebook['description']; ?></td>
        <td><a href="/order/<?php echo $ebook['id']; ?>">ORDER</a></td>
    </tr>
<?php endforeach; ?>

</tbody>

</table>

</div>

@endsection