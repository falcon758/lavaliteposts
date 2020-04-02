<?php

namespace Postbuffer\Channels\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Postbuffer\Channels\Http\Requests\PostRequest;
use Postbuffer\Channels\Interfaces\PostRepositoryInterface;
use Postbuffer\Channels\Models\Post;

/**
 * Resource controller class for post.
 */
class PostResourceController extends BaseController
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
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Postbuffer\Channels\Repositories\Presenter\PostPresenter::class)
                ->$function();
        }

        $posts = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('channels::post.names'))
            ->view('channels::post.index', true)
            ->data(compact('posts', 'view'))
            ->output();
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

        if ($post->exists) {
            $view = 'channels::post.show';
        } else {
            $view = 'channels::post.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('channels::post.name'))
            ->data(compact('post'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new post.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(PostRequest $request)
    {

        $post = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('channels::post.name')) 
            ->view('channels::post.create', true) 
            ->data(compact('post'))
            ->output();
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
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $post                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('channels::post.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('channels/post/' . $post->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/channels/post'))
                ->redirect();
        }

    }

    /**
     * Show post for editing.
     *
     * @param Request $request
     * @param Model   $post
     *
     * @return Response
     */
    public function edit(PostRequest $request, Post $post)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('channels::post.name'))
            ->view('channels::post.edit', true)
            ->data(compact('post'))
            ->output();
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
            $attributes = $request->all();

            $post->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('channels::post.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('channels/post/' . $post->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('channels/post/' . $post->getRouteKey()))
                ->redirect();
        }

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
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('channels::post.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('channels/post/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('channels/post/' . $post->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple post.
     *
     * @param Model   $post
     *
     * @return Response
     */
    public function delete(PostRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('channels::post.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('channels/post'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/channels/post'))
                ->redirect();
        }

    }

    /**
     * Restore deleted posts.
     *
     * @param Model   $post
     *
     * @return Response
     */
    public function restore(PostRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('channels::post.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/channels/post'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/channels/post/'))
                ->redirect();
        }

    }

}
