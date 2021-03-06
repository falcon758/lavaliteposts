<?php

namespace Postbuffer\Channels\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Postbuffer\Channels\Http\Requests\PostRequest;
use Postbuffer\Channels\Models\Post;

/**
 * Admin web controller class.
 */
class PostWorkflowController extends BaseController
{

    /**
     * Workflow controller function for post.
     *
     * @param Model   $post
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(PostRequest $request, Post $post, $step)
    {

        try {

            $post->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('channels::post.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/post/post/' . $post->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/post/post/' . $post->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for post.
     *
     * @param Model   $post
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
     */

    public function getWorkflow(Post $post, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $post->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('channels::post.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('channels::admin.post.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('channels::admin.post.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('channels::admin.post.message', $data)->render();

        }

    }
}
