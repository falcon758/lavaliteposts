            <table class="table" id="main-table" data-url="{!!guard_url('channels/channel?withdata=Y')!!}">
                <thead>
                    <tr>
                        <th data-field="name">{!! trans('channels::channel.label.name')!!}</th>
                        <th data-field="actions"  data-formatter="operateFormatter" class="text-right">Actions</th>
                    </tr>
                </thead>
            </table>