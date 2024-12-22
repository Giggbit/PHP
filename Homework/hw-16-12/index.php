<?php
    class Control {
        private $background;
        private $width;
        private $height;

        public function getBackground() {
            return $this->background;
        }

        public function setBackground($background) {
            $this->background = $background;
        }

        public function getWidth() {
            return $this->width;
        }

        public function setWidth($width) {
            $this->width = $width;
        }

        public function getHeight() {
            return $this->height;
        }

        public function setHeight($height) {
            $this->height = $height;
        }
    }

    class Input extends Control {
        private $name;
        private $value;

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getValue() {
            return $this->value;
        }

        public function setValue($value) {
            $this->value = $value;
        }
    }

    class Button extends Input {
        private $isSubmit;

        public function __construct($background, $width, $height, $name, $value, $isSubmit) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setName($name);
            $this->setValue($value);
            $this->setSubmitState($isSubmit);
        }

        public function getSubmitState() {
            return $this->isSubmit;
        }

        public function setSubmitState($isSubmit) {
            $this->isSubmit = $isSubmit;
        }
    }

    class Text extends Input {
        private $placeholder;

        public function __construct($background, $width, $height, $name, $value, $placeholder) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setName($name);
            $this->setValue($value);
            $this->setPlaceholder($placeholder);
        }

        public function getPlaceholder() {
            return $this->placeholder;
        }

        public function setPlaceholder($placeholder) {
            $this->placeholder = $placeholder;
        }
    }

    class Label extends Control {
        private $for;

        public function __construct($background, $width, $height, $forObject) {
            $this->setBackground($background);
            $this->setWidth($width);
            $this->setHeight($height);
            $this->setParentName($forObject);
        }

        public function getParentName() {
            return $this->for;
        }

        public function setParentName($forObject) {
            $this->for = $forObject->getName();
        }
    }

    function convertToHTML($control) {
        if ($control instanceof Button) {
            return "<input type='button' name='{$control->getName()}' value='{$control->getValue()}' style='width:{$control->getWidth()}px; height:{$control->getHeight()}px; background-color:{$control->getBackground()};'>";
        } elseif ($control instanceof Text) {
            return "<input type='text' name='{$control->getName()}' placeholder='{$control->getPlaceholder()}' value='{$control->getValue()}' style='width:{$control->getWidth()}px; height:{$control->getHeight()}px; background-color:{$control->getBackground()};'>";
        } elseif ($control instanceof Label) {
            return "<label for='{$control->getParentName()}' style='width:{$control->getWidth()}px; height:{$control->getHeight()}px; background-color:{$control->getBackground()};'>{$control->getParentName()}</label>";
        }
        return '';
    }

    $button = new Button("red", 200, 50, "button1", "Button1", true);
    $text = new Text("white", 100, 50, "text1", "", "Enter text...");
    $label = new Label("orange", 100, 50, $text);

    echo convertToHTML($button);
    echo "<br>";
    echo convertToHTML($text);
    echo "<br>";
    echo convertToHTML($label);

?>
