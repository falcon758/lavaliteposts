<?php

namespace Channels\Postbuffer\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Channels\Postbuffer\Http\Requests\ChannelRequest;
use Channels\Postbuffer\Models\Channel;

/**
 * Admin web controller class.
 */
class ChannelWorkflowController extends BaseController
{

    /**
     * Workflow controller function for channel.
     *
     * @param Model   $channel
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(ChannelRequest $request, Channel $channel, $step)
    {

        try {

            $channel->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('postbuffer::channel.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/channel/channel/' . $channel->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/channel/channel/' . $channel->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for channel.
     *
     * @param Model   $channel
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
     */

    public function getWorkflow(Channel $channel, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $channel->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('postbuffer::channel.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('postbuffer::admin.channel.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('postbuffer::admin.channel.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('postbuffer::admin.channel.message', $data)->render();

        }

    }
}
