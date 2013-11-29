<?php

	Class extension_encoded_timestamp extends Extension {

		public function install() {
			return true;
		}

		public function uninstall() {
			return true;
		}

		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/frontend/',
					'delegate' => 'FrontendParamsResolve',
					'callback' => '__addParam'
				)
			);
		}


		/**
		 * Add timestamp to parameter pool
		 *
		 * @param array $context
		 *  delegate context
		 */
		public function __addParam($context) {

			$date = new DateTime();

			$context['params']['encoded_timestamp'] = base64_encode($date->getTimestamp());
		}

	}
