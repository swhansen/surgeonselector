class Card
  SUITES = {spade: "s", club: "c", diamond: "d", heart: "h"}
  VALUES = {1 => "A", 11 => "J", 12 => "Q", 13 => "K"}

  attr_accessor :suite, :value

  def initialize(suite, value)
    @suite = suite.to_sym
    @value = value
  end

  def to_s
    value_string = VALUES[self.value] || self.value
    "#{value_string}#{SUITES[self.suite]}"
  end
end

class Deck
  attr_accessor :cards

  def initialize(number=1)
    @cards = [] 
    number.times { @cards.concat fresh_cards }
  end

  def fresh_cards
    [].tap do |d|
      %w{heart diamond club spade}.each do |suite|
        (1..13).each { |n| d << Card.new(suite, n) }
      end
    end
  end

  def shuffle
    @cards.shuffle!
  end

  def draw(num=1)
    if cards.count < num
      @cards.concat fresh_cards
      shuffle
    end

    [].tap do |draw_cards|
      draw_cards.concat(@cards.pop(num)) 
    end
  end
end









class HandOfCards
  attr_accessor :cards

  def initialize
    @cards = []
  end

  def << cards
    @cards.concat cards
  end
  
  def score
    total = @cards.inject(0) { |result, card| result + points(card.value) }
    total = devalue_aces(total) if total > 21

    total
  end

  def devalue_aces(score)
    ace_count = @cards.select { |x| x == 1 }.count
    ace_count.times do
      score = score - 10
      break if score < 22
    end

    score
  end

  def points(num)
    case num
      when 11..13 then 10
      else num
    end
  end 
end 

class Hand
  attr_accessor :player_hand, :dealer_hand, :deck, :hand_over

  def initialize(deck)
    @deck        = deck 
    @hand_over   = false
    @player_hand = HandOfCards.new
    @dealer_hand = HandOfCards.new 

    @player_hand << @deck.draw(2)
    @dealer_hand << @deck.draw(2)
  end

  def play
    display
    get_move 

    return
  end

  def display
    system("clear")
    puts "Dealer: #{dealer_hand.cards} (#{dealer_hand.score})"
    puts "Player: #{player_hand.cards} (#{player_hand.score})"
  end

  def get_move
    return if hand_over
    puts "Move: (H)it (S)tand (Q)uit"
    m = gets.chomp
    case m.downcase
      when "h" then hit_player
      when "s" then dealer_go
      when "q" then raise "quitgame"
      else get_move
    end
  end

  def hit_player
    @player_hand << deck.draw
     
    if player_hand.score > 21 
      display
      decide_winner
    else
      play 
    end
  end

  def dealer_go
    until dealer_hand.score > 21 || dealer_hand.score > player_hand.score
      card = deck.draw
      puts "Dealer draws a #{card}"
      @dealer_hand << card
      gets.chomp
    end

    decide_winner
  end

  def decide_winner
    if player_hand.score > 21 
      puts "Player Lost"
    elsif player_hand.score == 21 || dealer_hand.score > 21
      puts "Player Won"
    elsif dealer_hand.score > player_hand.score 
      puts "Player Lost"
    else
      puts "Player Won"
    end

    @hand_over = true
    gets.chomp
  end 
end

class Game
  attr_accessor :deck 

  def initialize
    @deck = Deck.new
    @deck.shuffle
  end

  def play
    begin
      1000.times { Hand.new(@deck).play }
    rescue "quitgame"
      puts "thanks for playing"
    end
  end
end

Game.new.play