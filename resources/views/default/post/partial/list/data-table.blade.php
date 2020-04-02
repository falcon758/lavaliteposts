            <table class="table" id="main-table" data-url="{!!guard_url('channels/post?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="name">{!! trans('channels::post.label.name')!!}</th>
                    <th data-field="content">{!! trans('channels::post.label.content')!!}</th>
                    <th data-field="posts_id">{!! trans('channels::post.label.posts_id')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">Actions</th>
                    </tr>
                </thead>
            </table>