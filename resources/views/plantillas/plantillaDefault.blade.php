@extends('masteradmin')
@section('Titulo','Lista de Blogs')



@section('contenidoadmin')
<div class="container" style="text-align:center;font-family:Sulphur Point;color:black;">
    <div class="form-group">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div id="editor">
                    function foo(items) {
                    var x = "All this is syntax highlighted";
                    return x;
                    }
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
<script>
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/javascript");
</script>
@endsection