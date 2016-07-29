<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: default
fields:
  title:
    label: Title
    type:  text
  theme:
    label: Theme
    type: select
    default: dark-sea
    options:
      dark-sea: Dark-sea
      dark-space: Dark-space
      blessed-light: Blessed-light
