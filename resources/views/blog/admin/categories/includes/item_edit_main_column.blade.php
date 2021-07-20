<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-items">
                        <a class="nav-link active" data-toggle="tab" role="tab" href="#maindata">Основные Данные</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{$item->title}}" id="title" class="form-control" minlength="3" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text" name="slug" value="{{$item->slug}}" id="slug" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id" id="parent_id" placeholder="Выберите категорию" class="form-control" required>

                                @foreach($category_list as $category)

                                    <option value="{{$category->id}}" @if($category->id == $item->parent_id) selected @endif >
                                        {{$category->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description" rows="3" class="form-control"> {{old('description', $item->description)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
