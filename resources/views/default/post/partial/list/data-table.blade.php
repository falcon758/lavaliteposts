            <table class="table" id="main-table" data-url="{!!guard_url('posts/post?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="name">{!! trans('posts::post.label.name')!!}</th>
                    <th data-field="content">{!! trans('posts::post.label.content')!!}</th>
                    <th data-field="posts_id">{!! trans('posts::post.label.posts_id')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">Actions</th>
                    </tr>
                </thead>
            </table>