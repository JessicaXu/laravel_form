@if (count($errors))

    <!-- 显示第一条错误提示 -->
    <div class="alert alert-danger">
        <ul>
            <li>{{$errors ->first()}}</li>
        </ul>
    </div>

    <!-- 所有的错误提示 -->
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif