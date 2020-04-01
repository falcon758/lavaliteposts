<?php

namespace Postbuffer\Posts\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Postbuffer\Posts\Http\Requests\PostRequest;
use Postbuffer\Posts\Interfaces\PostRepositoryInterface;
use Postbuffer\Posts\Models\Post;

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
            ->pushCriteria(\Postbuffer\Posts\Repositories\Criteria\PostResourceCriteria::class);
    }

    /**
     * Display a list of post.
     *
     * @return Response
     */
    public function index(PostRequest $request)
    {

        if ($this->response->typeIs('json')) {
            $pageLimit = $request->input('pageLimit');
            $data      = $this->repository
                ->setPresenter(\Postbuffer\Posts\Repositories\Presenter\PostListPresenter::class)
                ->getDataTable($pageLimit);
            return $this->response
                ->data($data)
                ->output();
        }

        $posts = $this->repository->paginate();

        return $this->response->title(trans('posts::post.names'))
            ->view('posts::post.index', true)
            ->data(compact('posts'))
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
            $view = 'posts::post.show';
        } else {
            $view = 'posts::post.new';
        }

        return $this->response->title(trans('app.view') . ' ' . trans('posts::post.name'))
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
        return $this->response->title(trans('app.new') . ' ' . trans('posts::post.name')) 
            ->view('posts::post.create', true) 
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

            return $this->response->message(trans('messages.success.created', ['Module' => trans('posts::post.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('posts/post/' . $post->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/posts/post'))
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
        return $this->response->title(trans('app.edit') . ' ' . trans('posts::post.name'))
            ->view('posts::post.edit', true)
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
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('posts::post.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('posts/post/' . $post->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('posts/post/' . $post->getRouteKey()))
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
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('posts::post.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('posts/post'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('posts/post/' . $post->getRouteKey()))
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

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('posts::post.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('posts/post'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/posts/post'))
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

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('posts::post.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/posts/post'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/posts/post/'))
                ->redirect();
        }

    }

}
