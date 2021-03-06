<?php

namespace Postbuffer\Channels\Http\Controllers;

use App\Http\Controllers\APIController as BaseController;
use Postbuffer\Channels\Http\Requests\ChannelRequest;
use Postbuffer\Channels\Interfaces\ChannelRepositoryInterface;
use Postbuffer\Channels\Models\Channel;
use Postbuffer\Channels\Forms\Channel as Form;

/**
 * APIController  class for channel.
 */
class ChannelAPIController extends BaseController
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
        return $this->repository
            ->setPresenter(\Postbuffer\Channels\Repositories\Presenter\ChannelPresenter::class)
            ->paginate();
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
        return $channel->setPresenter(\Postbuffer\Channels\Repositories\Presenter\ChannelListPresenter::class);
        ;
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
            $data              = $request->all();
            $data['user_id']   = user_id();
            $data['user_type'] = user_type();
            $data              = $this->repository->create($data);
            $message           = trans('messages.success.created', ['Module' => trans('channels::channel.name')]);
            $code              = 204;
            $status            = 'success';
            $url               = guard_url('channels/channel/' . $channel->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/channel');
        }
        return compact('data', 'message', 'code', 'status', 'url');
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
            $data = $request->all();

            $channel->update($data);
            $message = trans('messages.success.updated', ['Module' => trans('channels::channel.name')]);
            $code    = 204;
            $status  = 'success';
            $url     = guard_url('channels/channel/' . $channel->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/channel/' . $channel->getRouteKey());
        }
        return compact('data', 'message', 'code', 'status', 'url');
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
            $message = trans('messages.success.deleted', ['Module' => trans('channels::channel.name')]);
            $code    = 202;
            $status  = 'success';
            $url     = guard_url('channels/channel/0');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/channel/' . $channel->getRouteKey());
        }
        return compact('message', 'code', 'status', 'url');
    }

    /**
     * Return the form elements as json.
     *
     * @param String   $element
     *
     * @return json
     */
    public function form($element = 'fields')
    {
        $form = new Form();
        return $form->form($element, true);
    }

}
