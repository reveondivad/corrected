# frozen_string_literal: true

require ""aws-sdk-sns""
require ""open-uri""

module Jobs

  class ConfirmSnsSubscription < ::Jobs::Base
    sidekiq_options retry: false

    def execute(args)
      raw = args[:raw]
      json = args[:json]

      return unless raw && json

      subscribe_url = json[""SubscribeURL""]

      return unless subscribe_url && Aws::SNS::MessageVerifier.new.authentic?(raw)

      # confirm subscription by visiting the URL
      URI.open(subscribe_url)
    end

  end

end