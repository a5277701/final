�
 V  [7  �D$         � 	      !        �  ��          f�U�|��t�+��W^,    / ( �   �    �     	�&   ) �   �0   � �6$   �.   �) �   �/   � �6$   �.   ��PRIMARY�fit�tab_parent�tab_root_weight_title�                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        �                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      InnoDB      �
�
                                          8Maps paths to various callbacks (access, page and title)                                                                                                                                                              >$  D$        P   @     �       !1      D  �?�      D  �?�    �      !V      �  �?8    �      !/     	 �  �?6    �'	      !\     &     !5     *     !$     ,     !S    �0      !b    �/      !v    �.      !Q    �-      !6    �,      !�    �+      !�    �*      !7     )!     !J     -! D  �!    �7!      !Z     6$     !N     :$ H�  �!\ �path�load_functions�to_arg_functions�access_callback�access_arguments�page_callback�page_arguments�delivery_callback�fit�number_parts�context�tab_parent�tab_root�title�title_callback�title_arguments�theme_callback�theme_arguments�type�description�position�weight�include_file� Primary Key: the Drupal path this entry describesA serialized array of function names (like node_load) to be called to load an object corresponding to a part of the current path.A serialized array of function names (like user_uid_optional_to_arg) to be called to replace a part of the router path with another string.The callback which determines the access to this router path. Defaults to user_access.A serialized array of arguments for the access callback.The name of the function that renders the page.A serialized array of arguments for the page callback.The name of the function that sends the result of the page_callback function to the browser.A numeric representation of how specific the path is.Number of parts in this router path.Only for local tasks (tabs) - the context of a local task to control its placement.Only for local tasks (tabs) - the router path of the parent page (which may also be a local task).Router path of the closest non-tab parent page. For pages that are not local tasks, this will be the same as the path.The title for the current page, or the title for the tab if this is a local task.A function which will alter the title. Defaults to t()A serialized array of arguments for the title callback. If empty, the title will be used as the sole argument for the title callback.A function which returns the name of the theme that will be used to render this page. If left empty, the default theme will be used.A serialized array of arguments for the theme callback.Numeric representation of the type of the menu item, like MENU_LOCAL_TASK.A description of this item.The position of the block (left or right) on the system administration page for this item.Weight of the element. Lighter weights are higher up, heavier weights go down.The file to include for this element, usually the page callback function lives in this file.