<?php 
namespace SuperElement\Modules;

defined( 'ABSPATH' ) || exit;

class Controls_Ajax_Select2_Api extends \SuperElement\Admin\Api_Handler {

	public function config() {
		$this->prefix = 'ajaxselect2';
	}


	public function get_post_list() {

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;   
		}

		$query_args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => 10,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                    = explode( ',', $this->request['ids'] );
			$query_args['post__in'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['s'] = $this->request['s'];
		}

		$query   = new \WP_Query( $query_args );
		$options = array();
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) {
				$query->the_post();
				$options[] = array(
					'id'   => get_the_ID(),
					'text' => get_the_title(),
				);
			}
		endif;

		return array( 'results' => $options );
		wp_reset_postdata();
	}
	
	public function get_page_list() {
		if ( ! current_user_can( 'edit_posts' ) ) {
			return;   
		}
		$query_args = array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 10,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                    = explode( ',', $this->request['ids'] );
			$query_args['post__in'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['s'] = $this->request['s'];
		}

		$query   = new \WP_Query( $query_args );
		$options = array();
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) {
				$query->the_post();
				$options[] = array(
					'id'   => get_the_ID(),
					'text' => get_the_title(),
				);
			}
		endif;

		return array( 'results' => $options );
		wp_reset_postdata();
	}

	public function get_singular_list() {
		$query_args = array(
			'post_status'    => 'publish',
			'posts_per_page' => 10,
			'post_type'      => 'any',
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                    = explode( ',', $this->request['ids'] );
			$query_args['post__in'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['s'] = $this->request['s'];
		}

		$query   = new \WP_Query( $query_args );
		$options = array();
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) {
				$query->the_post();
				$options[] = array(
					'id'   => get_the_ID(),
					'text' => get_the_title(),
				);
			}
		endif;

		return array( 'results' => $options );
		wp_reset_postdata();
	}

	public function get_category() {

		$taxonomy   = 'category';
		$query_args = array(
			'taxonomy'   => array( 'category' ), // taxonomy name
			'orderby'    => 'name', 
			'order'      => 'DESC',
			'hide_empty' => true,
			'number'     => 10,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                   = explode( ',', $this->request['ids'] );
			$query_args['include'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['name__like'] = $this->request['s'];
		}

		$terms = get_terms( $query_args );

		$options = array();

		if ( is_countable( $terms ) && count( $terms ) > 0 ) :

			foreach ( $terms as $term ) {
				$options[] = array(
					'id'   => $term->term_id,
					'text' => $term->name,
				);
			}
		endif;      
		return array( 'results' => $options );
	}

	public function get_product_list() {
		$query_args = array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			'posts_per_page' => 3,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                    = explode( ',', $this->request['ids'] );
			$query_args['post__in'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['s'] = $this->request['s'];
		}

		$query   = new \WP_Query( $query_args );
		$options = array();
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) {
				$query->the_post();
				$options[] = array(
					'id'   => get_the_ID(),
					'text' => get_the_title(),
				);
			}
		endif;
		wp_reset_postdata();
		return array( 'results' => $options );
	}

	public function get_product_cat() {
		$query_args = array(
			'taxonomy'   => array( 'product_cat' ), // taxonomy name
			'orderby'    => 'name', 
			'order'      => 'DESC',
			'hide_empty' => false,
			'number'     => 10,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                   = explode( ',', $this->request['ids'] );
			$query_args['include'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['name__like'] = $this->request['s'];
		}

		$terms = get_terms( $query_args );

		$options = array();

		if ( is_countable( $terms ) && count( $terms ) > 0 ) :
			foreach ( $terms as $term ) {
				$options[] = array(
					'id'   => $term->term_id,
					'text' => $term->name,
				);
			}
		endif;
		return array( 'results' => $options );
	}
	public function get_product_tags() {
		$query_args = array(
			'taxonomy'   => array( 'product_tag' ), // taxonomy name
			'orderby'    => 'name', 
			'order'      => 'DESC',
			'hide_empty' => false,
			'number'     => 10,
		);

		if ( isset( $this->request['ids'] ) ) {
			$ids                   = explode( ',', $this->request['ids'] );
			$query_args['include'] = $ids;
		}
		if ( isset( $this->request['s'] ) ) {
			$query_args['name__like'] = $this->request['s'];
		}

		$terms = get_terms( $query_args );

		$options = array();

		if ( is_countable( $terms ) && count( $terms ) > 0 ) :
			foreach ( $terms as $term ) {
				$options[] = array(
					'id'   => $term->term_id,
					'text' => $term->name,
				);
			}
		endif;
		return array( 'results' => $options );
	}
}

new Controls_Ajax_Select2_Api();
