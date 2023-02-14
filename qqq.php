<?php
enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'Dasdas';
    case Clubs = 'C';
    case Spades = 'S';
}
echo Suit::Diamonds->value;
