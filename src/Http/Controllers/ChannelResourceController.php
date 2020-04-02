<?php

namespace Postbuffer\Channels\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Postbuffer\Channels\Http\Requests\ChannelRequest;
use Postbuffer\Channels\Interfaces\ChannelRepositoryInterface;
use Postbuffer\Channels\Models\Channel;

/**
 * Resource controller class for channel.
 */
class ChannelResourceController extends BaseController
{

    /**
     * Initialize channel resource controller.
     *
     * @param type ChannelRepositoryInterface $channel
     *
     * @return null
     */
    public function __construct(ChannelRepositoryInterface $channel)
    {
        parent::__construct();
        $this->repository = $channel;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Postbuffer\Channels\Repositories\Criteria\ChannelResourceCriteria::class);
    }

    /**
     * Display a list of channel.
     *
     * @return Response
     */
    public function index(ChannelRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Postbuffer\Channels\Repositories\Presenter\ChannelPresenter::class)
                ->$function();
        }

        $channels = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('channels::channel.names'))
            ->view('channels::channel.index', true)
            ->data(compact('channels', 'view'))
            ->output();
    }

    /**
     * Display channel.
     *
     * @param Request $request
     * @param Model   $channel
     *
     * @return Response
     */
    public function show(ChannelRequest $request, Channel $channel)
    {

        if ($channel->exists) {
            $view = 'channels::channel.show';
        } else {
            $view = 'channels::channel.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('channels::channel.name'))
            ->data(compact('channel'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new channel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ChannelRequest $request)
    {

        $channel = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('channels::channel.name')) 
            ->view('channels::channel.create', true) 
            ->data(compact('channel'))
            ->output();
    }

    /**
     * Create new channel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ChannelRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $channel                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('channels::channel.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('channels/channel/' . $channel->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/channels/channel'))
                ->redirect();
        }

    }

    /**
     * Show channel for editing.
     *
     * @param Request $request
     * @param Model   $channel
     *
     * @return Response
     */
    public function edit(ChannelRequest $request, Channel $channel)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('channels::channel.name'))
            ->view('channels::channel.edit', true)
            ->data(compact('channel'))
            ->output();
    }

    /**
     * Update the channel.
     *
     * @param Request $request
     * @param Model   $channel
     *
     * @return Response
     */
    public function update(ChannelRequest $request, Channel $channel)
    {
        try {
            $attributes = $request->all();

            $channel->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('channels::channel.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('channels/channel/' . $channel->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('channels/channel/' . $channel->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the channel.
     *
     * @param Model   $channel
     *
     * @return Response
     */
    public function destroy(ChannelRequest $request, Channel $channel)
    {
        try {

            $channel->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('channels::channel.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('channels/channel/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('channels/channel/' . $channel->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple channel.
     *
     * @param Model   $channel
     *
     * @return Response
     */
    public function delete(ChannelRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('channels::channel.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('channels/channel'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/channels/channel'))
                ->redirect();
        }

    }

    /**
     * Restore deleted channels.
     *
     * @param Model   $channel
     *
     * @return Response
     */
    public function restore(ChannelRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('channels::channel.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/channels/channel'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/channels/channel/'))
                ->redirect();
        }

    }

}
