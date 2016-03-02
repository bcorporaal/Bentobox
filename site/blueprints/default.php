<?php if(!defined('KIRBY')) exit ?>

title: Category
pages: false
files: false
fields:
  title:
    label: Title
    type:  text
  highlighted:
    label: Highlighted
    type: toggle
    text: yes/no
    default: no
  links:
    label: Links
    type: structure
    entry: >
      {{linklabel}} - {{visible}} - {{linkurl}}
    fields:
      linklabel:
        label: Label for this link
        type: text
      linkurl:
        label: URL
        type: url
      visible:
        label: Is this link visible?
        type: toggle
        text: yes/no
