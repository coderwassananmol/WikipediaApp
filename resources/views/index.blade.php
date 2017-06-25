@extends('Layouts.header')
@section('title')
    Welcome
    @endsection
<body>
<p class="heading">
    Please select your language:
</p>
<br />
<form method="GET" action="/welcome">
    <div class="languages">
        <select name="language">
            <?php
            for($i=1; $i<=sizeof($language); $i=$i+12) {
                if(array_key_exists('title',$language[$i]->nodes[0]->attr)) {
                    echo '<option value="'.$language[$i]->nodes[0]->nodes[0]->_[4].'-'.$language[$i+2]->nodes[0]->nodes[0]->_[4].'">'.$language[$i]->nodes[0]->nodes[0]->_[4].'</option>';
                }
            }
            ?>
        </select>
    </div>
    <br />
    <button type="submit" class="btn-primary">SUBMIT</button>
</form>
</body>
</html>