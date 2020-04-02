<?php

namespace Postbuffer\Channels\Http\Controllers;

use App\Http\Controllers\APIController as BaseController;
use Postbuffer\Channels\Http\Requests\PostRequest;
use Postbuffer\Channels\Interfaces\PostRepositoryInterface;
use Postbuffer\Channels\Models\Post;
use Postbuffer\Channels\Forms\Post as Form;

/**
 * APIController  class for post.
 */
class PostAPIController extends BaseController
{

    /**
     * Initialize post resource controller.
     *
     * @param type PostRepositoryInterface $post
     *
     * @return null
     */
    public function __construct(PostRepositoryInterface $post)
    {
        parent::__construct();
        $this->repository = $post;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Postbuffer\Channels\Repositories\Criteria\PostResourceCriteria::class);
    }

    /**
     * Display a list of post.
     *
     * @return Response
     */
    public function index(PostRequest $request)
    {
        return $this->repository
            ->setPresenter(\Postbuffer\Channels\Repositories\Presenter\PostPresenter::class)
            ->paginate();
    }

    /**
     * Display post.
     *
     * @param Request $request
     * @param Model   $post
     *
     * @return Response
     */
    public function show(PostRequest $request, Post $post)
    {
        return $post->setPresenter(\Postbuffer\Channels\Repositories\Presenter\PostListPresenter::class);
        ;
    }

    /**
     * Create new post.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        try {
            $data              = $request->all();
            $data['user_id']   = user_id();
            $data['user_type'] = user_type();
            $data              = $this->repository->create($data);
            $message           = trans('messages.success.created', ['Module' => trans('channels::post.name')]);
            $code              = 204;
            $status            = 'success';
            $url               = guard_url('channels/post/' . $post->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/post');
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Update the post.
     *
     * @param Request $request
     * @param Model   $post
     *
     * @return Response
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $data = $request->all();

            $post->update($data);
            $message = trans('messages.success.updated', ['Module' => trans('channels::post.name')]);
            $code    = 204;
            $status  = 'success';
            $url     = guard_url('channels/post/' . $post->getRouteKey());
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/post/' . $post->getRouteKey());
        }
        return compact('data', 'message', 'code', 'status', 'url');
    }

    /**
     * Remove the post.
     *
     * @param Model   $post
     *
     * @return Response
     */
    public function destroy(PostRequest $request, Post $post)
    {
        try {
            $post->delete();
            $message = trans('messages.success.deleted', ['Module' => trans('channels::post.name')]);
            $code    = 202;
            $status  = 'success';
            $url     = guard_url('channels/post/0');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $code    = 400;
            $status  = 'error';
            $url     = guard_url('channels/post/' . $post->getRouteKey());
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
